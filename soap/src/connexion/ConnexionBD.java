package connexion;

import java.sql.Connection;
import java.sql.DriverManager;

public class ConnexionBD {
	private static Connection connection;
	static {
		try {
			Class.forName("com.mysql.jdbc.Driver").newInstance();
			//java.sql.Driver con = new com.mysql.jdbc.Driver();
			connection=DriverManager.getConnection("jdbc:mysql://localhost:3306/mglsi_news","root","");
		}catch(Exception e) {
			e.printStackTrace();
		}
		
	}
	public static Connection getConnection() {
		return connection;
	}


}
