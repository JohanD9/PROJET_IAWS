package main;

import java.io.IOException;
import java.io.PrintStream;
import java.text.ParseException;

import jsonObject.Departure;
import jsonObject.GestionPlace;
import jsonObject.Place;

import org.json.JSONException;

import parsers.ParserBusTime;
import parsers.ParserFacPharma;
import parsers.ParserVeloTime;

public class Main
{

	public static void main (String[] args) throws IOException, JSONException, ParseException
	{
		String lieuOrig = args[0];
		String villeOrig = args[1];
		String lieuArriv = args[2];
		String villeArriv = args[3];
		
		ParserVeloTime p = new ParserVeloTime();
		p.parse(lieuOrig.replaceAll(" ", "%20"), villeOrig.replaceAll(" ", "%20"), lieuArriv.replaceAll(" ", "%20"), villeArriv.replaceAll(" ", "%20"));
	
		
		ParserBusTime p2 = new ParserBusTime();
		p2.parse(lieuOrig.replaceAll(" ", "%20"), villeOrig.replaceAll(" ", "%20"), lieuArriv.replaceAll(" ", "%20"), villeArriv.replaceAll(" ", "%20"));
		
		
		String html = "<h3>Votre trajet :</h3>\n"
				+ "<hr class=\"monHR\">\n"
				+ "<p><span style=\"font-size: large; font-weight:bold;\">Départ : </span>" + p.getStartAddress() + "</p>"
				+ "<p><span style=\"font-size: large; font-weight:bold;\">Arrivée : </span>" + p.getEndAdress() + "</p>\n"
				+ "<hr>\n"
				+ "<div id=\"tempsBus\">"
				+ "<span style= \"font-size: large; font-weight:bold;\">Temps de trajet	en Bus : </span>"
				+ "<span class=\"heure\">" + p2.getDuration() + "</span><br>\n"
				+ "<span style= \"font-size: large; font-weight:bold;\">Distance de trajet	en Bus : </span>"
				+ "<span class=\"heure\">" + p2.getDistance() + "</span>\n"
				+ "</div><hr>\n"
				+ "<div id=\"tempsVelos\">"
				+ "<span style= \"font-size: large; font-weight:bold;\">Temps de trajet	en Vélô : </span>"
				+ "<span class=\"heure\">" + p.getDuration() + "</span><br>\n"
				+ "<span style= \"font-size: large; font-weight:bold;\">Distance de trajet	en Vélô : </span>"
				+ "<span class=\"heure\">" + p.getDistance() + "</span>\n"
				+ "</div>\n";
		
		// Sortie HTML format utf-8
		PrintStream pstream = new PrintStream(System.out, true, "UTF-8");
		pstream.println(html);
	}

}
