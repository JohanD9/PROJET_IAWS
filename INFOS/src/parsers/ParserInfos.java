package parsers;

import java.io.IOException;
import java.util.ArrayList;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import jsonObjects.Message;
import lienHttp.LaunchRequest;

public class ParserInfos
{
	private ArrayList<Message> listeMessages;
	
	public ParserInfos ()
	{
		this.listeMessages = new ArrayList<Message>();
	}
	
	public ArrayList<Message> parse() throws IOException, JSONException
	{
		int i;
		
		String http = new String("http://pt.data.tisseo.fr/messagesList?format=json"
				+ "&contentFormat=html&key=a03561f2fd10641d96fb8188d209414d8");
		
		LaunchRequest requestInfos = new LaunchRequest(http);
		
		String jsonInfos = requestInfos.get();
		
		JSONObject jsonObject = new JSONObject(jsonInfos);
		JSONArray jsonArray = jsonObject.getJSONArray("messages");
		
		JSONObject jsonObject2;
		Message m;
		
		for (i=0; i<jsonArray.length(); i++)
		{
			jsonObject2 = jsonArray.getJSONObject(i).getJSONObject("message");
			m = new Message(jsonObject2.getString("title"), jsonObject2.getString("content"));
			
			this.listeMessages.add(m);
			
			m = null;
			jsonObject2 = null;
		}
		
		return (this.listeMessages);
	}
}
