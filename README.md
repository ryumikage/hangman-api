# hangman-api
hangman api
there 3 urls 

GET /words
get all the words in the database

POST /word
To put a word in the database, will return the word and its id. If a word is already in the database, the api will return a 409 HTTP Conflict.

GET /word/#id
get 1 word by its id
