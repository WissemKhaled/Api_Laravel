let requestHelper = {
   get: function(url, callback) {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
         callback(JSON.parse(this.responseText));
         }
       }
       xhttp.open("GET", url, true);
       xhttp.send();
   },
   delete: function(url, callback) {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
           callback(JSON.parse(this.responseText));
         }
       }
       xhttp.open("DELETE", url, true);
       xhttp.send();
   },
   post: function(url, data, callback) {
     var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
           callback(JSON.parse(this.responseText));
         }
       }
       xhttp.open("POST", url, true);
       xhttp.setRequestHeader('Content-Type', 'application/json');
       xhttp.send(JSON.stringify(data));
   }
 }