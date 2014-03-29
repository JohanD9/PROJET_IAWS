import java.io.IOException;

import org.json.JSONException;
import org.json.JSONObject;


public class Main
{
	public static void main(String[] args) throws IOException, JSONException
	{
		/*
		 * Récupération de la place Paul Sabatier
		 */
		LaunchRequest requestPaulSab = new LaunchRequest(
				"http://pt.data.tisseo.fr/placesList?format=json&term=paul%20sabatier&displayOnlyStopAreas=1"
				+ "&number=1&key=a03561f2fd10641d96fb8188d209414d8");
		String resPaulSab = requestPaulSab.get();
		
		ParserJsonStop pjPaulSab = new ParserJsonStop(resPaulSab);
		Place placePaulSab = pjPaulSab.parse();
		System.out.println(placePaulSab.toString());
		
		/*
		 * Récupération de la place Paul Sabatier
		 */
		LaunchRequest requestFacPharma = new LaunchRequest(
				"http://pt.data.tisseo.fr/placesList?format=json&term=paul%20sabatier&displayOnlyStopAreas=1"
				+ "&number=1&key=a03561f2fd10641d96fb8188d209414d8");
		String resFacPharma = requestFacPharma.get();
		
		ParserJsonStop pjFacPharma = new ParserJsonStop(resFacPharma);
		Place placeFacPharma = pjFacPharma.parse();
		System.out.println(placeFacPharma.toString());
		
		//JSONObject jsonObj = new JSONObject(p);
		
		/*String requeteBusPaulSab = new String("http://pt.data.tisseo.fr/departureBoard?format=json&stopPointId="+placePaulSab.getId()+"&key=a03561f2fd10641d96fb8188d209414d8");
		LaunchRequest requestListAreasPaulSab = new LaunchRequest(requeteBusPaulSab);
		String resultAreasPaulSab = requestListAreasPaulSab.get();
		
		System.out.println(requeteBusPaulSab);
		System.out.println(resultAreasPaulSab);
		*/
		
	}
}
