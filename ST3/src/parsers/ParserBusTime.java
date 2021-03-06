package parsers;

import java.io.IOException;

import lienHttp.LaunchRequest;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class ParserBusTime
{
	private String distance;
	private String duration;
	private String startAddress;
	private String endAddress;
	
	public ParserBusTime()
	{
		this.distance = new String();
		this.duration = new String();
		this.startAddress = new String();
		this.endAddress = new String();
	}
	
	public String getDistance() {
		return distance;
	}


	private void setDistance(String distance) {
		this.distance = distance;
	}



	public String getDuration() {
		return duration;
	}



	private void setDuration(String duration) {
		this.duration = duration;
	}



	public String getStartAddress() {
		return startAddress;
	}



	private void setStartAddress(String startAddress) {
		this.startAddress = startAddress;
	}



	public String getEndAdress() {
		return endAddress;
	}



	private void setEndAddress(String endAddress) {
		this.endAddress = endAddress;
	}



	public void parse(String lieuOrigine, String villeOrigine, String lieuArrivee, String villeArrivee) throws IOException, JSONException
	{
		String http = new String("http://maps.googleapis.com/maps/api/directions/json?origin="
				+ lieuOrigine + "%20" + villeOrigine + "&destination=" 
				+ lieuArrivee + "%20" + villeArrivee + "&sensor=false&avoid=highways|ferries&mode=drivingg&alternatives=false");
		
		LaunchRequest requestBusTime = new LaunchRequest(http);
		
		String jsonBusTime = requestBusTime.get();
		
		JSONObject jsonObject = new JSONObject(jsonBusTime);
		JSONArray jsonArray = jsonObject.getJSONArray("routes");
		JSONArray jsonArray2 = jsonArray.getJSONObject(0).getJSONArray("legs");
		
		this.setDuration(jsonArray2.getJSONObject(0).getJSONObject("duration").getString("text"));
		this.setDistance(jsonArray2.getJSONObject(0).getJSONObject("distance").getString("text"));
		this.setStartAddress(jsonArray2.getJSONObject(0).getString("start_address"));
		this.setEndAddress(jsonArray2.getJSONObject(0).getString("end_address"));
	}
	
	public String toString()
	{
		return new String(this.getStartAddress() + " - " + this.getEndAdress()
				+ "\n" + this.getDistance() + " - " + this.getDuration());
	}
}
