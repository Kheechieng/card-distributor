# card-distributor
A personal playing cards distributor program written in Laravel PHP and run in virtual machine using Docker.

### Theme  
Playing cards will be given out to n(number) people.  

### Purpose  
Total 52 cards containing 1-13 of each Spade(S), Heart(H), Diamond(D), Club(C) will be given to n people randomly.

### Output Format
    a. Spade = S, Heart = H, Diamond = D, Club = C  
    b. Card 2 to 9 are, as it is, 1=A, 10=X, 11=J, 12=Q, 13=K  
    c. The card distributed to the first person on the first row will be separated (comma),  
    d. The card distributed to the second person on the second row will be separated(comma),  
    e. [LF] is not allowed. Example:  
        S-A,H-X,.....  
        D-3,H-J,.....  
    
### Steps
```
docker-compose build
docker-compose up -d
docker-compose exec -u root app bash
```

```
composer install
composer update
composer dumpautoload -o
```

Open browser and type `http://localhost/login` in the address bar.  


![image](https://user-images.githubusercontent.com/19460508/103405802-54ce1600-4b93-11eb-8177-f383b9bfeac3.png)
![image](https://user-images.githubusercontent.com/19460508/103410407-0ece7d80-4ba6-11eb-8c25-23b5a811b359.png)

Invalid input  


![image](https://user-images.githubusercontent.com/19460508/103410411-12620480-4ba6-11eb-9c70-4baf20963623.png)
