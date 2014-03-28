import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.URL;
import java.net.URLConnection;


public class LaunchRequest {
	String url;
	
	
	
	public LaunchRequest(String url) {
		super();
		this.url = url;
	}



	public String get() throws IOException {
		String source ="";
		URL oracle = new URL(url);
		URLConnection yc = oracle.openConnection();
		BufferedReader in = new BufferedReader(new InputStreamReader(yc.getInputStream()));
		String inputLine;
		 
		while ((inputLine = in.readLine()) != null)
		source +=inputLine;
		in.close();
		return source;
	}
	
	
}
