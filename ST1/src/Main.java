import java.io.IOException;

import org.json.JSONException;
import org.json.JSONObject;


public class Main
{
	public static void main(String[] args) throws IOException, JSONException
	{
		LaunchRequest test = new LaunchRequest("http://pt.data.tisseo.fr/placesList?format=json&term=paul%20sabatier&displayOnlyStopAreas=1&number=1&key=a03561f2fd10641d96fb8188d209414d8");
		
		String res = test.get();
		
		ParserJson pj = new ParserJson(res);
		JSONObject jsonObj = pj.parse();
		
		System.out.println(jsonObj.toString());
		System.out.println(jsonObj.get("id"));
	}
}
