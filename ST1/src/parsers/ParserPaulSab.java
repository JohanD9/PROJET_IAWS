package parsers;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import jsonObject.Departure;
import jsonObject.Place;
import lienHttp.LaunchRequest;

import org.json.JSONException;


public class ParserPaulSab
{
	private String idZoneArret;
	private List<String> listeCodeOperator;
	private List<Departure> listeDeparture;
	
	public ParserPaulSab ()
	{
		this.idZoneArret = new String();
		this.listeCodeOperator = new ArrayList<String>();
		this.listeDeparture = new ArrayList<Departure>();
	}
	
	public List<Departure> parse() throws IOException, JSONException
	{
		// résupère l'id de la zone d'arret paul sab
		
		LaunchRequest requestPaulSabId = new LaunchRequest(
				"http://pt.data.tisseo.fr/placesList?format=json&term=paul%20sabatier&displayOnlyStopAreas=1"
						+ "&number=1&key=a03561f2fd10641d96fb8188d209414d8");
		String resPaulSabId = requestPaulSabId.get();
		
		ParserJsonStop pjPaulSabStop = new ParserJsonStop(resPaulSabId);
		Place placePaulSab = pjPaulSabStop.parse();
		
		this.idZoneArret += placePaulSab.getId();
		
		//récupère la liste des poteaux physiques
		
		LaunchRequest requestPaulSabPoteaux = new LaunchRequest("http://pt.data.tisseo.fr/stopPointsList?stopAreaId="
				+ this.idZoneArret + "&number=10&format=json&key=a03561f2fd10641d96fb8188d209414d8");
		
		String resPaulSabPoteaux = requestPaulSabPoteaux.get();
		
		ParserJsonPoteaux pjPaulSabPoteaux = new ParserJsonPoteaux(resPaulSabPoteaux);
		listeCodeOperator.addAll(pjPaulSabPoteaux.parse());
		
		//récupère la liste des Departures
		
		String resPaulSabBus;
		ParserJsonAreasList pjalPaulSabBus;
		
		for (String codeOperator : listeCodeOperator)
		{
			LaunchRequest requestPaulSabBus = new LaunchRequest("http://pt.data.tisseo.fr/departureBoard?operatorCode="
					+ codeOperator +"&number=2&format=json&key=a03561f2fd10641d96fb8188d209414d8");
			
			resPaulSabBus = requestPaulSabBus.get();
			pjalPaulSabBus = new ParserJsonAreasList(resPaulSabBus);
			
			listeDeparture.addAll(pjalPaulSabBus.parse());
			
			pjalPaulSabBus = null;
			resPaulSabBus = null;
		}
		
		return (listeDeparture);
	}
}
