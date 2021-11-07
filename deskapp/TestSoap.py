from zeep import Client

client = Client(wsdl='http://localhost:8686/UtilisateursService?wsdl')

print(client.service.listerUtilisateur())
