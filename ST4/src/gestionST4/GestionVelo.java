package gestionST4;

import java.io.IOException;
import java.util.ArrayList;

import org.json.JSONException;

import parserJson.ParserJsonStation;
import HTTPrequest.LaunchGetHTTP;

public class GestionVelo {
	private ArrayList<Station> listStations;

	public GestionVelo() throws IOException, JSONException {
		listStations = new ArrayList<Station>();
		init();
	}
	
	private void init() throws IOException, JSONException {
		// Récupération de la station Paul Sab
		String urlStationPaulSab = "https://api.jcdecaux.com/vls/v1/stations/227?"
				+ "contract=Toulouse&apiKey=d3a6958a033987763c45e1311847f98909303f34";
		String jSonPaulSab;

		LaunchGetHTTP getStationPaulSab = new LaunchGetHTTP(urlStationPaulSab);
		jSonPaulSab = getStationPaulSab.get();
		
		ParserJsonStation parserStationPaulSab = new ParserJsonStation(jSonPaulSab);
		Station PaulSab = parserStationPaulSab.parse();
			
		// Récupération de la station Paul Sab
		String urlStationFacPharma = "https://api.jcdecaux.com/vls/v1/stations/228?"
				+ "contract=Toulouse&apiKey=d3a6958a033987763c45e1311847f98909303f34";
		String jSonFacPharma;

		LaunchGetHTTP getStationFacPharma = new LaunchGetHTTP(urlStationFacPharma);
		jSonFacPharma = getStationFacPharma.get();
			
		ParserJsonStation parserStationFacPharma = new ParserJsonStation(jSonFacPharma);
		Station FacPharma = parserStationFacPharma.parse();
		
		// Ajout des deux stations à la liste des stations
		listStations.add(PaulSab);		//INDEX 0
		listStations.add(FacPharma);	//INDEX 1
	}
	
	public int getNbVelosDispo(Station courante) {
		switch (courante.getNumber()) {
			case 227:
				return listStations.get(0).getAvailable_bikes();
		
			case 228:
				return listStations.get(0).getAvailable_bikes();
		}
		return -1;
	}
	
	public int getNbPlacesDispo(Station courante) {
		switch (courante.getNumber()) {
			case 227:
				return listStations.get(0).getAvailable_bike_stands();
		
			case 228:
				return listStations.get(0).getAvailable_bike_stands();
		}
		return -1;
	}

	public ArrayList<Station> getListStations() {
		return listStations;
	}
	
	
	
	

}
