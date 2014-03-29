package gestionST4;

import java.io.IOException;

import org.json.JSONException;

import parserJson.ParserJsonStation;
import HTTPrequest.LaunchGetHTTP;

public class main {

	public static void main(String[] args) throws NumberFormatException, IOException, JSONException {
		
		if (args.length != 0) {
			GestionVelo monGestionnaire = new GestionVelo(Integer.parseInt(args[0]));
			int nbVelo = monGestionnaire.getNbVelosDispo();
			
			if (nbVelo == -1) {
				System.out.println("Aucune station correspondante au numéro entré");
			} else if (nbVelo > 0) {
				System.out.println("Il y a " + nbVelo + " vélos disponibles");
			} else {
				System.out.println("Il n'y a aucun vélos disponible");
			}
		} else {
			System.out.println("Entrez un numéro de station valide  en paramètre");
		}
		
	}
}
