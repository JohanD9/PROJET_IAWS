package LienHttp;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;
import java.nio.charset.Charset;


public class LaunchRequest
{
	 private String url;
	
	public LaunchRequest(String url)
	{
		this.url = url;
	}
	
	/*
	 * Fonction pour faire un requete HTTP (GET)
	 * Return un string contenant le Json a traiter
	 */
	public String get() throws IOException
	{
		String source ="";
		String inputLine;
		URL u = new URL(url);
		URLConnection uc = u.openConnection();
		BufferedReader br = new BufferedReader(new InputStreamReader(uc.getInputStream(), Charset.forName("UTF-8")));
		
		while ((inputLine = br.readLine()) != null)
		{
			source +=inputLine;
		}
		
		br.close();
		
		return source;
	}
	
	
}
