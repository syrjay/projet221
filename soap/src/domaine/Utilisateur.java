package domaine;

public class Utilisateur {
	private String matricule;
	private String nom;
	private String prenom ;
	private String tel;
	private String adresse;
	private String login;
	private String password;
	
	public Utilisateur(String matricule, String nom, String prenom, String tel, String adresse, String login,
			String password) {
		super();
		this.matricule = matricule;
		this.nom = nom;
		this.prenom = prenom;
		this.tel = tel;
		this.adresse = adresse;
		this.login = login;
		this.password = password;
	}

	public Utilisateur() {
		super();
		// TODO Auto-generated constructor stub
	}

	public String getMatricule() {
		return matricule;
	}

	public void setMatricule(String matricule) {
		this.matricule = matricule;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public String getPrenom() {
		return prenom;
	}

	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}

	public String getTel() {
		return tel;
	}

	public void setTel(String tel) {
		this.tel = tel;
	}

	public String getAdresse() {
		return adresse;
	}

	public void setAdresse(String adresse) {
		this.adresse = adresse;
	}

	public String getLogin() {
		return login;
	}

	public void setLogin(String login) {
		this.login = login;
	}

	public String getPassword() {
		return password;
	}

	public void setPassword(String password) {
		this.password = password;
	}
	

}
