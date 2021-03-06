package parserJson;
import gestionST2.Line;

import java.util.ArrayList;
import java.util.List;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class ParserJsonLine
{
	private String json;
	
	public ParserJsonLine(String json)
	{
		this.json = json;
	}
	
	public List<Line> parse () throws JSONException
	{
		int i;
		List<Line> listeLine = new ArrayList<Line>();
		JSONObject innerJsonObjectDeparture;
		JSONObject innerJsonObjectLine;
		JSONObject jsonObject = new JSONObject(json);
		JSONObject innerJsonObject = jsonObject.getJSONObject("departures");
		JSONArray jsonArray = innerJsonObject.getJSONArray("departure");
		
		for(i = 0 ; i < (jsonArray.length() - 1) ; i++)
		{
			Line line1 = new Line();
			
			innerJsonObjectDeparture = jsonArray.getJSONObject(i);
			innerJsonObjectLine = innerJsonObjectDeparture.getJSONObject("line");
			
			line1.setName(innerJsonObjectLine.getString("name"));
			line1.setShortName(innerJsonObjectLine.getString("shortname"));
			line1.setNetwork(innerJsonObjectLine.getString("network"));
			line1.setColor(innerJsonObjectLine.getString("color"));
			
			listeLine.add(line1);
			
			innerJsonObjectDeparture = null;
			line1 = null;
		}
		
		return (listeLine);
	}
}
