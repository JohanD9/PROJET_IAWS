import java.io.IOException;


public class main {

	public static void main(String[] args) throws IOException {
		LaunchRequest test = new LaunchRequest("http://pt.data.tisseo.fr/placesList?format=json&term=Paul%20Sabatier&key=a03561f2fd10641d96fb8188d209414d8");
		
		String res = test.get();
		System.out.println(res);
	}

}
