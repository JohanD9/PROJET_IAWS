package parserJson;

import gestionST4.Position;
import gestionST4.Station;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

public class ParserJsonStation {
	private String json;
	
	public ParserJsonStation (String json)
	{
		this.json = json;
	}
	
	public Station parse () throws JSONException
	{
		JSONObject jsonObjectStation = new JSONObject(json);
		JSONObject innerJsonObjectPos = jsonObjectStation.getJSONObject("position");
		
		Station s = new Station();
		Position p = new Position();
		
		// Recuperation des coordonnées de la station
		p.setLat(innerJsonObjectPos.getDouble("lat"));
		p.setLng(innerJsonObjectPos.getDouble("lng"));
		
		// Mise à jour de l'objet station selon le json
		s.setPosition(p);
		s.setNumber(jsonObjectStation.getInt("number"));
		s.setName(jsonObjectStation.getString("name"));
		s.setAddress(jsonObjectStation.getString("address"));
		s.setBanking(jsonObjectStation.getBoolean("banking"));
		s.setBonus(jsonObjectStation.getBoolean("bonus"));;
		s.setStatus(jsonObjectStation.getString("status"));
		s.setContract_name(jsonObjectStation.getString("contract_name"));
		s.setBike_stands(jsonObjectStation.getInt("bike_stands"));
		s.setAvailable_bike_stands(jsonObjectStation.getInt("available_bike_stands"));
		s.setAvailable_bikes(jsonObjectStation.getInt("available_bikes"));
		s.setLast_update(jsonObjectStation.getInt("last_update"));
		
		return s;
	}
}
