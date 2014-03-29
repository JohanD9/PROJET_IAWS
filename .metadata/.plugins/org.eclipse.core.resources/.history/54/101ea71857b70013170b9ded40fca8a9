package parserJson;

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
		JSONObject jsonObject = new JSONObject(json);
		JSONObject innerJsonObject = jsonObject.getJSONObject("placesList");
		JSONArray jsonArray = innerJsonObject.getJSONArray("place");
		
		Station s = new Station();
		
		/*
		p.setId(jsonArray.getJSONObject(0).getString("id"));
		p.setRank(jsonArray.getJSONObject(0).getString("rank"));
		p.setCategory(jsonArray.getJSONObject(0).getString("category"));
		p.setClassName(jsonArray.getJSONObject(0).getString("className"));
		p.setLabel(jsonArray.getJSONObject(0).getString("label"));
		p.setNetwork(jsonArray.getJSONObject(0).getString("network"));
		p.setX(jsonArray.getJSONObject(0).getString("x"));
		p.setY(jsonArray.getJSONObject(0).getString("y"));
		p.setKey(jsonArray.getJSONObject(0).getString("key"));
		*/
		
		return s;
	}
}
