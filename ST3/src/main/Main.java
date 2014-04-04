package main;

import java.io.IOException;

import org.json.JSONException;

import parsers.ParserVeloTime;

public class Main
{

	public static void main (String[] args) throws IOException, JSONException
	{
		String lieuOrig = new String ("Universite paul sabatier");
		String villeOrig = new String ("toulouse");
		String lieuArriv = new String ("lycee saint exupery");
		String villeArriv = new String ("blagnac");
		
		ParserVeloTime p = new ParserVeloTime();
		p.parse(lieuOrig.replaceAll(" ", "%20"), villeOrig.replaceAll(" ", "%20"), lieuArriv.replaceAll(" ", "%20"), villeArriv.replaceAll(" ", "%20"));
		
		System.out.println(p.toString());
	}

}
