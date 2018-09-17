

## Backup

```shell
cp wordpress-backup.timer /etc/systemd/system/
cp wordpress-backup.service /etc/systemd/system/
systemctl daemon-reload
systemctl enable wordpress-backup.timer
systemctl start wordpress-backup.timer

```
