SELECT * FROM users; 

SELECT * FROM users_friends;

SELECT * FROM users JOIN;

SELECT
users.alias, users.id, users.name, users.email, users_friends.added_friend_id
FROM users JOIN users_friends ON users_friends.user_id = users.id
WHERE users_friends.added_friend_id NOT IN (SELECT
users_friends.added_friend_id FROM users_friends
JOIN users ON users.id = users_friends.user_id
WHERE users_friends.user_id = 5);
                                            
SELECT users.*, users_friends.*
 FROM users JOIN users_friends ON users_friends.added_friend_id = users.id
	NOT IN(SELECT users_friends.user_id FROM users_friends JOIN users 
    ON users.id = users_friends.user_id
    WHERE users_friends.added_friend_id = 4);
    
    SELECT users.*, users_friends.*
              FROM users JOIN users_friends ON users_friends.added_friend_id = users.id
              JOIN users another ON another.id = users_friends.added_friend_id
              WHERE users_friends.added_friend_id != 5;
              
DELETE FROM users_friends WHERE added_friend_id = 4; 