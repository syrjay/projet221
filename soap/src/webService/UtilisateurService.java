package webService;


import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import javax.jws.WebMethod;
import javax.jws.WebService;

import connexion.ConnexionBD;
import domaine.Utilisateur;

@WebService(name = "UtilisateurService")
public class UtilisateurService {
	
	private PreparedStatement st=null;
	private ResultSet rs=null;
	
	@WebMethod
	public void ajouterUtilisateur(Utilisateur uti) {
		Connection con = ConnexionBD.getConnection();
		try {
			st = con.prepareStatement("insert into utilisateurs values(?,?,?,?,?,?,?)");
			st.setString(1,uti.getMatricule());
			st.setString(2,uti.getNom());
			st.setString(3,uti.getPrenom());
			st.setString(4,uti.getTel());
			st.setString(5,uti.getAdresse());
			st.setString(6,uti.getLogin());
			st.setString(7,uti.getPassword());
			st.executeUpdate();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	    
	}
	@WebMethod
	public List<Utilisateur> listerUtilisateur(){
		List<Utilisateur> listes = new  ArrayList<>();
			Connection con = ConnexionBD.getConnection();
		try {
			st = con.prepareStatement("select * from utilisateurs");
			rs = st.executeQuery();
			while(rs.next()) {
				Utilisateur uti = new Utilisateur();
				uti.setMatricule(rs.getString("matricule"));
				uti.setNom(rs.getString("nom"));
				uti.setPrenom(rs.getString("prenom"));
				uti.setTel(rs.getString("telephone"));  
				uti.setAdresse(rs.getString("adresse")); 
		        listes.add(uti);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return listes;
				
	}
	@WebMethod
	public void mdifierUtilisateur(Utilisateur uti) {
		Connection con = ConnexionBD.getConnection();
		try
		 {
		st = con.prepareStatement("update utilisateurs set nom = ?, prenom= ?,telephone= ?,adresse=? where matricule = ?");
		st.setString(1,uti.getNom());
		st.setString(2,uti.getPrenom());
		st.setString(3,uti.getTel());
		st.setString(4,uti.getAdresse());
		st.setString(5,uti.getMatricule());
		st.executeUpdate();
	  }

	  catch(Exception e)

	  {

	  System.out.println(e.getMessage());

	  }
		
	}
	@WebMethod
	public void supprimerUtiliateur(String matricule) {
		Connection con = ConnexionBD.getConnection();
		try
		 {
		st = con.prepareStatement("delete from utilisateurs where matricule = ?");
		st.setString(1,matricule);
		st.executeUpdate();
	  }
	  catch(Exception e)

	  {

	  System.out.println(e.getMessage());

	  }
		
	}

}
