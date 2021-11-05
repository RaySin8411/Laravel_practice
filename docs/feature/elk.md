## Save Logs in Elasticsearch, Logstash, and Kibana

### Basic Software

* PostgreSQL

* PHP - Laravel

* BELG Stack(filebeat, elasticsearch, logstash)

#### BELG Stack Configuration

Update /etc/elasticsearch/elasticsearch.yml, change the contents to the following

```yaml
path.data: /var/lib/elasticsearch
path.logs: /var/log/elasticsearch
network.host: 127.0.0.1
http.port: 9200
```

Setup logstash to accept UDP logs

* Step 1
  ```shell
  cp /etc/logstash/logstash-sample.conf /etc/logstash/conf.d/logstash.conf
  ```
* Step 2 Edit `/etc/logstash/conf.d/logstash.conf`, Update the contents of the file with the following

    ```editorconfig
    input {
      udp {
        codec => "json"
        port => 5055
      }
      beats {
        port => 5044
      }
    
    }
    
    output { 
        elasticsearch { 
            hosts => ["http://localhost:9200"]
            index => "laravel"
        } 
    }
    ```
  
* Step 3 Restart
    ```shell
    systemctl restart elasticsearch && \
    systemctl enable elasticsearch && \
    systemctl restart logstash && \
    systemctl enable logstash && \
    systemctl restart filebeat && \
    systemctl enable filebeat
    ```

### Setup Laravel to log to ELK
* Step 1 Update logging settings
    
    Update `/var/www/app/config/logging.php`
  
* Step 2 Create command to test logging
    ```shell
    cd /var/www/app && \
    php artisan make:command TestCommand
    ```
    Update `/var/www/app/app/Console/Commands/TestCommand.php`

* Run
    ```shell
    php artisan command:name
    ```

### Advanced Software/Settings
* Prometheus
* Enable Elasticsearch HTTPS
* Grafana


### Reference

* [Save your Laravel logs in Elasticsearch](https://fritsstegmann.me/youtube/setting-up-laravel-elk)
