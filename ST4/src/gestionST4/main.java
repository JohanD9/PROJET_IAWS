package gestionST4;

import java.io.IOException;

import org.json.JSONException;

public class main {

	public static void main(String[] args) throws NumberFormatException, IOException, JSONException {
		GestionVelo monGestionnaire = new GestionVelo();
		String html = "";
		
		for(Station courante: monGestionnaire.getListStations()){
			html += "<div class=\"station\">\n"
					+ "<h3>Station " + courante.getName() + " :  </h3>\n"
						+ "<p class=\"adresse\">" + courante.getAddress() + "</p>\n"
							+ "<span>Il y a " + courante.getAvailable_bikes() + " velos disponibles | " + courante.getAvailable_bike_stands() + " places libres</span>\n"
								+ "<br>\n";
			for (int i = 0; i < courante.getAvailable_bikes(); i++) {
				html += "<img src=\"pictures/veloLibre.jpg\" alt=\"Velo disponible\" height=\"30\" width=\"30\"> \n";
			}
			for (int i = 0; i < courante.getAvailable_bike_stands(); i++) {
				html += "<img src=\"pictures/placeLibre.jpg\" alt=\"Place disponible\" height=\"30\" width=\"30\"> \n";
			}
			
			html += "</div>\n";
			if(monGestionnaire.getListStations().indexOf(courante) != monGestionnaire.getListStations().size()-1) {
				html += "<hr>\n";
			}
		}
		
		System.out.println(html);
		
	}
}
