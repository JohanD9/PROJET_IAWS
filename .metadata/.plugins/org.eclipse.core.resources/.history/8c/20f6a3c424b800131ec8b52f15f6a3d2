import java.util.ArrayList;
import java.util.List;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class ParserJsonAreasList
{
	private String json;
	
	public ParserJsonAreasList(String json)
	{
		this.json = json;
	}
	
	public List<Departure> parse () throws JSONException
	{
		int i;
		List<Departure> listeDep = new ArrayList<Departure>();
		Departure dep;
		JSONObject innerJsonObjectDeparture;
		JSONObject innerJsonObjectLine;
		JSONArray innerJsonArrayDestination;
		
		JSONObject jsonObject = new JSONObject(json);
		JSONObject innerJsonObject = jsonObject.getJSONObject("departures");
		JSONArray jsonArray = innerJsonObject.getJSONArray("departure");
		
		for(i=0; i<(jsonArray.length()-1); i++)
		{
			dep = new Departure();
			innerJsonObjectDeparture = jsonArray.getJSONObject(i);
			innerJsonObjectLine = innerJsonObjectDeparture.getJSONObject("line");
			innerJsonArrayDestination = innerJsonObjectDeparture.getJSONArray("destination");
			
			dep.setDateTime(innerJsonObjectDeparture.getString("dateTime"));
			dep.setRealTime(innerJsonObjectDeparture.getString("realTime"));
			
			dep.getLine().setName(innerJsonObjectLine.getString("name"));
			dep.getLine().setShortName(innerJsonObjectLine.getString("shortName"));
			dep.getLine().setNetwork(innerJsonObjectLine.getString("network"));
			dep.getLine().setColor(innerJsonObjectLine.getString("color"));
			
			dep.getDestination().setName(innerJsonArrayDestination.getJSONObject(0).getString("name"));
			dep.getDestination().setCityName(innerJsonArrayDestination.getJSONObject(0).getString("cityName"));
			
			listeDep.add(dep);
			
			innerJsonArrayDestination = null;
			innerJsonObjectDeparture = null;
			dep = null;
		}
		
		return (listeDep);
	}
}
