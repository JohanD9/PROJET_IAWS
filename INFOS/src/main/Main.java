package main;

import java.io.IOException;
import java.io.PrintStream;
import java.util.ArrayList;

import jsonObjects.Message;

import org.json.JSONException;

import parsers.ParserInfos;

public class Main
{
	public static void main(String[] args) throws IOException, JSONException
	{
		int i;
		ParserInfos p = new ParserInfos();
		ArrayList<Message> listeMessage = new ArrayList<Message>();
		ArrayList<String> listeTitle = new ArrayList<String>();
		ArrayList<String> listeContent = new ArrayList<String>();
		
		listeMessage.addAll(p.parse());
		
		for(i=0; i<listeMessage.size(); i++)
		{
			listeTitle.add(listeMessage.get(i).getTitle());
			listeContent.add(listeMessage.get(i).getContent());
		}
		
		String html = "";
		for (int j = 0; j < listeTitle.size(); j++) {
			html += "<div class=\"infos\" id=\"infos1\" onClick=\"pop(" + j + ");\">\n"
					+ "<p>" + listeTitle.get(j) + "</p>\n"
							+ "</div>\n"
							+ "<div id=\"infosContent" + j + "\" style=\"display: none\">\n"
									+ listeContent.get(j) + "</div>\n"
											+ "<hr>\n";
		}
		
		PrintStream pstream = new PrintStream(System.out, true, "UTF-8");
		pstream.println(html);
	}
}