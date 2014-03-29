import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.json.JSONException;
import org.json.JSONObject;

public class Main {
	public static void main(String[] args) throws IOException, JSONException {
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
		 * Récupération de la place Faculté de pharmacie
		 */

		LaunchRequest requestFacPharma = new LaunchRequest(
				"http://pt.data.tisseo.fr/placesList?format=json&term=faculte%20de%20pharmacie&displayOnlyStopAreas=1"
						+ "&number=1&key=a03561f2fd10641d96fb8188d209414d8");
		String resFacPharma = requestFacPharma.get();

		ParserJsonStop pjFacPharma = new ParserJsonStop(resFacPharma);
		Place placeFacPharma = pjFacPharma.parse();
		System.out.println(placeFacPharma.toString());
		
		/*
		 * Récupération de la liste des lignes qui passent par l'arret Paul Sabatier
		 */
		
		String requeteBusPaulSab = new String(
				"http://pt.data.tisseo.fr/departureBoard?format=json&stopPointId="
						+placePaulSab.getId()+"&key=a03561f2fd10641d96fb8188d209414d8");
		
		LaunchRequest requestListAreasPaulSab = new LaunchRequest(requeteBusPaulSab);
		String resultAreasPaulSab = requestListAreasPaulSab.get();
		
		ParserJsonAreasList pjalPaulSab = new ParserJsonAreasList(resultAreasPaulSab);
		List<Departure> listeDepPaulSab = new ArrayList<Departure>();
		listeDepPaulSab.addAll(pjalPaulSab.parse());
		
		System.out.println(listeDepPaulSab);
	}
}
