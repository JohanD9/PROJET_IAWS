import java.io.IOException;
import java.io.ObjectInputStream.GetField;
import java.io.PrintStream;
import java.text.ParseException;
import java.util.ArrayList;
import java.util.List;

import org.json.JSONException;

public class Main {

	public static void main(String[] args) throws IOException, JSONException, ParseException {
		/*
		 * R�cup�ration de la place Paul Sabatier
		 */
		LaunchRequest requestPaulSab = new LaunchRequest(
				"http://pt.data.tisseo.fr/placesList?format=json&term=paul%20sabatier&displayOnlyStopAreas=1"
						+ "&number=1&key=a03561f2fd10641d96fb8188d209414d8");
		String resPaulSab = requestPaulSab.get();

		ParserJsonStop pjPaulSab = new ParserJsonStop(resPaulSab);
		Place placePaulSab = pjPaulSab.parse();

		/*
		 * R�cup�ration de la place Facult� de pharmacie
		 */

		LaunchRequest requestFacPharma = new LaunchRequest(
				"http://pt.data.tisseo.fr/placesList?format=json&term=faculte%20de%20pharmacie&displayOnlyStopAreas=1"
						+ "&number=1&key=a03561f2fd10641d96fb8188d209414d8");
		String resFacPharma = requestFacPharma.get();

		ParserJsonStop pjFacPharma = new ParserJsonStop(resFacPharma);
		Place placeFacPharma = pjFacPharma.parse();
		
		/*
		 * R�cup�ration de la liste des lignes qui passent par l'arret Paul Sabatier
		 */
		
		/*String requeteBusPaulSab = new String(
				"http://pt.data.tisseo.fr/departureBoard?format=json&stopPointId="
						+placePaulSab.getId()+"&key=a03561f2fd10641d96fb8188d209414d8");
		
		LaunchRequest requestListAreasPaulSab = new LaunchRequest(requeteBusPaulSab);
		String resultAreasPaulSab = requestListAreasPaulSab.get();
		
		ParserJsonAreasList pjalPaulSab = new ParserJsonAreasList(resultAreasPaulSab);
		List<Departure> listeDepPaulSab = new ArrayList<Departure>();
		listeDepPaulSab.addAll(pjalPaulSab.parse());
		*/
		
		
		

		
		/*
		 * R�cup�ration de la liste des lignes qui passent par l'arret Paul Sabatier
		 */
		
		/*String requeteBusFacPharma = new String(
				"http://pt.data.tisseo.fr/departureBoard?format=json&stopPointId="
						+placeFacPharma.getId()+"&key=a03561f2fd10641d96fb8188d209414d8");
		
		LaunchRequest requestListAreasFacPharma = new LaunchRequest(requeteBusFacPharma);
		String resultAreasFacPharma = requestListAreasFacPharma.get();
		
		ParserJsonAreasList pjalFacPharma = new ParserJsonAreasList(resultAreasFacPharma);
		List<Departure> listeDepFacPharma = new ArrayList<Departure>();
		listeDepFacPharma.addAll(pjalFacPharma.parse());
		
		for (int i=0; i<listeDepFacPharma.size(); i++)
		{
			System.out.println(listeDepFacPharma.get(i).toString());
		}*/
		
		Boolean hr = false;
		String displayDiv = "block";
		int nbLike = 1050;
		int nbUnlike = 103;
		
		GestionPlace gestionPaulSab = new GestionPlace(placePaulSab);
		gestionPaulSab.parseShortname();

		
		String html = "<div id=\"paulSab\" style = \"display:" + displayDiv + ";\">\n";
		String shortname = "";
		String ps = "paulSab";
		String fp = "facPharma";
		
		while ((shortname = gestionPaulSab.getNextShortName()) != null) {
			if (hr) {
				html += "<br>\n";
			}
			hr = true;
			html += "<table class=\"maTable\">\n"
					+ "<tr>\n"
					+ "<td class=\"numBus\" style=\"background-color: rgb" + gestionPaulSab.getListDepartureNum(shortname).get(0).getLine().getColor() + ";\">"
					+ shortname + "</td>\n"
							+ "<td class=\"infoBus\">" + gestionPaulSab.getListDepartureNum(shortname).get(0).getLine().getName() 
							+ "<div class=icone style=\"float: right;\">\n"
							+ "<img id=like" + shortname + " class=\"clic\" src=\"pictures/like.png\" "
							+ "alt=\"Like\" height=\"30\" width=\"30\" onclick=\"like('" + shortname + "');\">\n<span>" + nbLike + "</span>"
							+ "<img id=unlike" + shortname + " class=\"clic\" src=\"pictures/unlike.png\" "
							+ "alt=\"Unlike\" height=\"30\" width=\"30\" onclick=\"unlike('" + shortname + "');\">\n<span>" + nbUnlike + "</span>"
							+ "<img id=img" + shortname + ps
							+ " class=\"clic\" style=\"float: right;\" src=\"pictures/plus.png\""
							+ "alt=\"Velo disponible\" height=\"30\" width=\"30\""
							+ "onclick=\"show_panel('ligne"+ shortname + ps + "', 'img"+ shortname + ps + "');\">\n</div>\n</td>\n"
							+ "</tr>\n</table>\n"
							+"<div style=\"display: none;\" id=\"ligne" + shortname + ps + "\" class=\"infosDepart\">";
			for (String dest: gestionPaulSab.getListDestination(shortname)) {
				html += "<div class=\"infosDepartLigne\">\n"
						+ "<p class=\"direction\">" + dest + " :</p>\n"
								+ "<div class=\"dateDepart\">\n";
				for (Departure dep: gestionPaulSab.getListDepartureNum(shortname)) {
					if (dep.getDestination().getName().equals(dest)) {
						html += "<span>" + dep.getDateTime() + "</span><br>\n";
					}
				}
				html += "</div>\n</div>\n";
			}
			html += "</div>\n";
			
		}
		html += "</div>\n";
		
		
		hr = true;
		displayDiv = "none";
		GestionPlace gestionFacPharma = new GestionPlace(placeFacPharma);
		gestionFacPharma.parseShortname();
		
		html += "<div id=\"facPharma\" style = \"display:" + displayDiv + ";\">\n";
		shortname = "";
		
		while ((shortname = gestionFacPharma.getNextShortName()) != null) {
			if (hr) {
				html += "<br>\n";
			}
			hr = true;
			html += "<table class=\"maTable\">\n"
					+ "<tr>\n"
					+ "<td class=\"numBus\" style=\"background-color: rgb" + gestionFacPharma.getListDepartureNum(shortname).get(0).getLine().getColor() + ";\">"
					+ shortname + "</td>\n"
							+ "<td class=\"infoBus\">" + gestionFacPharma.getListDepartureNum(shortname).get(0).getLine().getName()
							+ "<div class=icone style=\"float: right;\">\n"
							+ "<img id=like" + shortname + " class=\"clic\" src=\"pictures/like.png\" "
							+ "alt=\"Like\" height=\"30\" width=\"30\" onclick=\"like('" + shortname + "');\">\n<span>" + nbLike + "</span>"
							+ "<img id=unlike" + shortname + " class=\"clic\" src=\"pictures/unlike.png\" "
							+ "alt=\"Unlike\" height=\"30\" width=\"30\" onclick=\"unlike('" + shortname + "');\">\n<span>" + nbUnlike + "</span>"
							+ "<img id=img" + shortname + fp
							+ " class=\"clic\" style=\"float: right;\" src=\"pictures/plus.png\""
							+ "alt=\"Velo disponible\" height=\"30\" width=\"30\""
							+ "onclick=\"show_panel('ligne"+ shortname + fp + "', 'img"+ shortname + fp + "');\">\n</div>\n</td>\n"
							+ "</tr>\n</table>\n"
							+"<div style=\"display: none;\" id=\"ligne" + shortname + fp + "\" class=\"infosDepart\">";
			for (String dest: gestionFacPharma.getListDestination(shortname)) {
				html += "<div class=\"infosDepartLigne\">\n"
						+ "<p class=\"direction\">" + dest + " :</p>\n"
								+ "<div class=\"dateDepart\">\n";
				for (Departure dep: gestionFacPharma.getListDepartureNum(shortname)) {
					if (dep.getDestination().getName().equals(dest)) {
						html += "<span>" + dep.getDateTime() + "</span><br>\n";
					}
				}
				html += "</div>\n</div>\n";
			}
			html += "</div>\n";
		}
		html += "</div>\n</div>\n";
		
		PrintStream pstream = new PrintStream(System.out, true, "UTF-8");
        pstream.println(html);
		
		
		/*while (gestionPaulSab.getNextShortName() != null) {
			String shortname = gestionPaulSab.getNextShortName();
			
			html += "<div id=\"paulSab\">\n"
					+ "<table class=\"maTable\">\n"
					+ "<tr>\n"
					+ "<td class=\"numBus\" style=\"background-color: " + rgb(178, 145, 255);">;
					
		}*/
		
				
		
		
		
	}
}
