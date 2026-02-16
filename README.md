<h1>Film-api</h1>
<p>Ez a 'films' adatbázis api-ja.</p>
<p>Az adatbázist a következő fájlban találja: films.sql</p>
<hr>
<h2>Végpontok</h2>
<table>
  <tr>
    <th>URL HTTP</th>
    <th>method</th>
    <th>JSON Response</th>
  </tr>
  <tr>
    <td>/actors</td>
    <td>POST</td>
    <td>Új szereplő létrehozás</td>
  </tr>
  <tr>
    <td>/casting</td>
    <td>POST</td>
    <td>Új casting létrehozás</td>
  </tr>
  <tr>
    <td>/category</td>
    <td>POST</td>
    <td>Új kategória létrehozás</td>
  </tr>
  <tr>
    <td>/director</td>
    <td>POST</td>
    <td>Új rendező létrehozás</td>
  </tr>
  <tr>
    <td>/movies</td>
    <td>POST</td>
    <td>Új film létrehozás</td>
  </tr>
  <tr>
    <td>/studio</td>
    <td>POST</td>
    <td>Új stúdió létrehozás</td>
  </tr>
  <tr>
    <td>/actors</td>
    <td>GET</td>
    <td>Összes szereplő lekérdezése</td>
  </tr>
  <tr>
    <td>/actors/{id}</td>
    <td>GET</td>
    <td>Megadott id-jű szereplő lekérdezése</td>
  </tr>
  <tr>
    <td>/casting</td>
    <td>GET</td>
    <td>Összes casting lekérdezése</td>
  </tr>
  <tr>
    <td>/casting/{id}</td>
    <td>GET</td>
    <td>Megadott id-jű casting lekérdezése</td>
  </tr>
  <tr>
    <td>/category</td>
    <td>GET</td>
    <td>Összes kategória lekérdezése</td>
  </tr>
  <tr>
    <td>/category/{id}</td>
    <td>GET</td>
    <td>Megadott id-jű kategória lekérdezése</td>
  </tr>
  <tr>
    <td>/director</td>
    <td>GET</td>
    <td>Összes rendező lekérdezése</td>
  </tr>
  <tr>
    <td>/director/{id}</td>
    <td>GET</td>
    <td>Megadott id-jű rendező lekérdezése</td>
  </tr>
  <tr>
    <td>/movies</td>
    <td>GET</td>
    <td>Összes film lekérdezése</td>
  </tr>
  <tr>
    <td>/movies/{id}</td>
    <td>GET</td>
    <td>Megadott id-jű film lekérdezése</td>
  </tr>
  <tr>
    <td>/studio</td>
    <td>GET</td>
    <td>Összes stúdió lekérdezése</td>
  </tr>
  <tr>
    <td>/studio/{id}</td>
    <td>GET</td>
    <td>Megadott id-jű stúdió lekérdezése</td>
  </tr>
  <tr>
    <td>/actors/{id}</td>
    <td>PUT</td>
    <td>Megadott id-jű szereplő módosítása</td>
  </tr>
  <tr>
    <td>/casting/{id}</td>
    <td>PUT</td>
    <td>Megadott id-jű casting módosítása</td>
  </tr>
  <tr>
    <td>/category/{id}</td>
    <td>PUT</td>
    <td>Megadott id-jű kategória módosítása</td>
  </tr>
  <tr>
    <td>/director/{id}</td>
    <td>PUT</td>
    <td>Megadott id-jű rendező módosítása</td>
  </tr>
  <tr>
    <td>/movies/{id}</td>
    <td>PUT</td>
    <td>Megadott id-jű film módosítása</td>
  </tr>
  <tr>
    <td>/studio/{id}</td>
    <td>PUT</td>
    <td>Megadott id-jű stúdió módosítása</td>
  </tr>
  <tr>
    <td>/actors/{id}</td>
    <td>DELETE</td>
    <td>Megadott id-jű szereplő törlése</td>
  </tr>
  <tr>
    <td>/casting/{id}</td>
    <td>DELETE</td>
    <td>Megadott id-jű casting törlése</td>
  </tr>
  <tr>
    <td>/category/{id}</td>
    <td>DELETE</td>
    <td>Megadott id-jű kategória törlése</td>
  </tr>
  <tr>
    <td>/director/{id}</td>
    <td>DELETE</td>
    <td>Megadott id-jű rendező törlése</td>
  </tr>
  <tr>
    <td>/movies/{id}</td>
    <td>DELETE</td>
    <td>Megadott id-jű film törlése</td>
  </tr>
  <tr>
    <td>/studio/{id}</td>
    <td>DELETE</td>
    <td>Megadott id-jű stúdió törlése</td>
  </tr>
</table>
