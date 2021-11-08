import javax.xml.ws.Endpoint;

import webService.UtilisateurService;


public class Serveur {

	public static void main(String[] args) {
		String url = "http://localhost:8686/";
		Endpoint.publish(url, new UtilisateurService());
		System.out.println("web service deployé avec succes");

	}

}
