# Sistem-Informasi-Akademik-BackEnd
Sistem Informasi Akademik BackEnd menggunakan framework CodeIgniter
Academic Information System BackEnd using CodeIgniter.

# Rest In CI
This is a rest application based on CodeIgniter, [REST in CI](https://github.com/dhanifudin/rest-in-ci).

# Setup
You need to deploy database schema `siakad2.sql` into your mysql server. Then configure database configuration on `application/config/database.php`. Insert new user into database.

# Run
You can run using [Postman](https://chrome.google.com/webstore/detail/postman/fhbjgbiflinjbdggehcddcbncdddomop?hl=id) Extension


Create JWT Token

```
URL: http://localhost/auth/token
Method: POST
Multipart Form:
    username: <user>
    password: <user>(not encrypted)
```

Create Data
You need to set jwt token into Authorization header.
```
URL: http://localhost/bio_siswa
Method: POST
Multipart Form:
    nis : <bio_siswa>
    nama: <bio_siswa>
```

List Data
```
URL: http://localhost/bio_siswa
Method: GET
```

