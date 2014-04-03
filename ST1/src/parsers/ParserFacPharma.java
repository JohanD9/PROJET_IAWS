package parsers;

import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import jsonObject.Departure;
import jsonObject.Place;
import lienHttp.LaunchRequest;

import org.json.JSONException;

public class ParserFacPharma
{
	private String idZoneArret;
	private List<String> listeCodeOperator;
	private ArrayList<Departure> listeDeparture;
	
	public ParserFacPharma ()
	{
		this.idZoneArret = new String();
		this.listeCodeOperator = new ArrayList<String>();
		this.listeDeparture = new ArrayList<Departure>();
	}
	
	public ArrayList<Departure> parse() throws IOException, JSONException
	{
		// r�sup�re l'id de la zone d'arret paul sab
		
		LaunchRequest requestFacPharmaId = new LaunchRequest(
				"http://pt.data.tisseo.fr/placesList?format=json&term=faculte%20de%20pharmacie&displayOnlyStopAreas=1"
						+ "&number=1&key=a03561f2fd10641d96fb8188d209414d8");
		String resFacPharmaId = requestFacPharmaId.get();
		
		ParserJsonStop pjFacPharmaStop = new ParserJsonStop(resFacPharmaId);
		Place placeFacPharma = pjFacPharmaStop.parse();
		
		this.idZoneArret += placeFacPharma.getId();
		
		//r�cup�re la liste des poteaux physiques
		
		LaunchRequest requestFacPharmaPoteaux = new LaunchRequest("http://pt.data.tisseo.fr/stopPointsList?stopAreaId="
				+ this.idZoneArret + "&format=json&key=a03561f2fd10641d96fb8188d209414d8");
		
		String resFacPharmaPoteaux = requestFacPharmaPoteaux.get();
		
		ParserJsonPoteaux pjFacPharmaPoteaux = new ParserJsonPoteaux(resFacPharmaPoteaux);
		listeCodeOperator.addAll(pjFacPharmaPoteaux.parse());
		
		//r�cup�re la liste des Departures
		
		String resFacPharmaBus;
		ParserJsonAreasList pjalFacPharmaBus;
		
		for (String codeOperator : listeCodeOperator)
		{
			LaunchRequest requestFacPharmaBus = new LaunchRequest("http://pt.data.tisseo.fr/departureBoard?operatorCode="
					+ codeOperator +"&number=2&format=json&key=a03561f2fd10641d96fb8188d209414d8");
			
			resFacPharmaBus = requestFacPharmaBus.get();
			pjalFacPharmaBus = new ParserJsonAreasList(resFacPharmaBus);
			
			listeDeparture.addAll(pjalFacPharmaBus.parse());
			
			pjalFacPharmaBus = null;
			resFacPharmaBus = null;
		}
		
		return (listeDeparture);
	}
}
