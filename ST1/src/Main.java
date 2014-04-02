import java.io.IOException;
import java.util.ArrayList;
import java.util.List;

import org.json.JSONException;

public class Main {
	public static void main(String[] args) throws IOException, JSONException
	{
		String arret = new String("");
		
		if (args.length != 1)
		{
			System.out.println("Erreur : nombre de paramètres incorrect");
		}
		else
		{
			if (args[0].equals("paul%20sabatier"))
			{
				arret += "Université Paul Sabatier";
			}
			else
			{
				arret += "Faculté de Pharmacie";
			}
			
			System.out.println(arret);
			
			/*
			 * Récupération de la place
			 */
			
			LaunchRequest request = new LaunchRequest(
					"http://pt.data.tisseo.fr/placesList?format=json&term="+args[0]+"&displayOnlyStopAreas=1"
							+ "&number=1&key=a03561f2fd10641d96fb8188d209414d8");
			
			String res = request.get();
			
			ParserJsonStop parsJson = new ParserJsonStop(res);
			Place place = parsJson.parse();
			
			/*
			 * Récupération de la liste des lignes qui passent par l'arret
			 */
			
			String requeteBus = new String(
			"http://pt.data.tisseo.fr/departureBoard?format=json&stopPointId="
					+place.getId()+"&key=a03561f2fd10641d96fb8188d209414d8");

			LaunchRequest requestListAreas = new LaunchRequest(requeteBus);
			String resultAreas = requestListAreas.get();
			
			
			ParserJsonAreasList parsJsonAreasList = new ParserJsonAreasList(resultAreas);
			List<Departure> listeDep = new ArrayList<Departure>();
			listeDep.addAll(parsJsonAreasList.parse());
			
			System.out.println(listeDep.size());
			
			for (int i=0; i<listeDep.size(); i++)
			{
				if (!listeDep.get(i).getDestination().getName().equals(arret))
				{
					System.out.println(listeDep.get(i).getDestination().getName());
				}
			}
		}
	}
}
