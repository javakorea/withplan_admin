#!/bin/bash

/usr/bin/nohup /lib/jvm/java-17-openjdk-amd64/bin/java -Dfile.encoding=UTF-8 -cp /home/ubuntu/withplan/WEB-INF/classes:/home/ubuntu/withplan/WEB-INF/lib/* \
    -Dserver.port="8443" \
    -Dserver.ssl.key-store="/home/ubuntu/ssoKey/withplankorea.com.jks" \
    -Dserver.ssl.key-store-password="7wiy88h3" \
    -DSERVER_GUBUN="P" \
    -DGOOGLE_APPLICATION_CREDENTIALS="/home/ubuntu/websquare_home/mobilewithplan-50bc7-firebase-adminsdk-a8ipp-991bbd9b03.json" \
    -DWEBSQUARE_HOME="/home/ubuntu/websquare_home" \
    M.Moca3Application > /home/ubuntu/nohup.out 2>&1 &
