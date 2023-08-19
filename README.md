# Autentification JWT avec Symfony
Projet dans lequel on utilise Symfony Security et le Lexik JWT Bundle pour créer une inscription avec hashage de mot de passe et une authentification avec JWT

## How To Use
1. Cloner le projet
2. Créer la base de données (`symfony_auth_rest` par défaut) et importer le database.sql dedans
3. Faire un `composer install`
4. Générer les clés privée/publique avec `php bin/console lexik:jwt:generate-keypair` (si ça ne marche pas sur windows, installer OpenSSL, fichier d'installation disponible sur le teams)
5. Lancer le serveur avec `symfony server:start`

## Pour se logger
1. Envoyer une requête POST vers http://localhost:8000/api/login avec comme body :
```json
{
    "username":"test@test.com",
    "password": "1234"
}
```
2. Copier la valeur du token renvoyée
3. Pour tester le token, faire une requête vers http://localhost:8000/api/protected en GET en mettant dans l'onglet Auth -> Bearer le token copié précédemment