package gestionST4;

import java.io.IOException;

import org.json.JSONException;

import parserJson.ParserJsonStation;
import HTTPrequest.LaunchGetHTTP;

public class main {

	public static void main(String[] args) throws IOException, JSONException {
		String urlStationPaulSab = "https://api.jcdecaux.com/vls/v1/stations/227?"
				+ "contract=Toulouse&apiKey=d3a6958a033987763c45e1311847f98909303f34";
		String jSonPaulSab;

		LaunchGetHTTP getStationPaulSab = new LaunchGetHTTP(urlStationPaulSab);
		jSonPaulSab = getStationPaulSab.get();
		
		ParserJsonStation parserStationPaulSab = new ParserJsonStation(jSonPaulSab);
		Station PaulSab = parserStationPaulSab.parse();
		
		System.out.println(PaulSab.toString());

	}

}
