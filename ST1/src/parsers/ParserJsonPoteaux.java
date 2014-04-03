package parsers;
import java.util.ArrayList;
import java.util.List;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class ParserJsonPoteaux
{
	String json;
	List<String> listCodeOperator;
	
	public ParserJsonPoteaux(String js)
	{
		this.json = js;
		this.listCodeOperator = new ArrayList<String>();
	}
	
	public List<String> parse() throws JSONException
	{
		int i;
		JSONObject jsonObject = new JSONObject(json);
		JSONObject jsonInnerObject = jsonObject.getJSONObject("physicalStops");
		JSONArray jsonArray = jsonInnerObject.getJSONArray("physicalStop");
		JSONObject jsonObject2, jsonObject3;
		JSONArray jsonArray2;
		
		for (i=0; i<jsonArray.length(); i++)
		{
			jsonObject2 = jsonArray.getJSONObject(i);
			jsonArray2 = jsonObject2.getJSONArray("operatorCodes");
			jsonObject3 = jsonArray2.getJSONObject(0);
			
			listCodeOperator.add(jsonObject3.getJSONObject("operatorCode").getString("value"));
			
			jsonObject3 = null;
			jsonArray2 = null;
			jsonObject2 = null;
		}
		
		return (listCodeOperator);
	}
}
