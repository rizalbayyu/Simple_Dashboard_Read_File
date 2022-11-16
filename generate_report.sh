#!/bin/bash
date_now=$(date --date="now" +%Y-%m-%d)

echo "serverTest $date_now" > serverTest_report_backup_$date_now.txt
ls /home/rizal/aplikasi_backup >> serverTest_report_backup_$date_now.txt
