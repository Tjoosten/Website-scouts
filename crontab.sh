# Crontab http://www.st-joris-turnhout.be
#
# --------------------
# Usage:
# --------------------
#
# sudo crontab -l <= see what cronjobs are running
# sudo crontab -e <= edit the crontab
#
# ---------------------
# Aliases:
# ---------------------
#
# @reboot    => Runs oce by server reboot
# @yearly    => Runs once a year
# @annually  => Runs once a year
# @montly    => Runs once a month
# @weekly    => Runs once a week
# @daily     => Runs once a day
# @midnight  => Runs t midnight
# @hourly    => Runes once a hour
#
# ---------------------
# The crontab  syntax
# ---------------------
#
# .---------------- Minutes (0 - 59)
# |  .------------- Hour (0 - 23)
# |  |  .---------- Day (1 - 31)
# |  |  |  .------- Month (1 - 12) of januari, februari, maart...
# |  |  |  |  .---- Day of the week (0 - 6) (Sunday = 0 or 7)
# |  |  |  |  |
# *  *  *  *  *  Executed command

0 0 * * * php /scoutnet.be/users/st-joris/public_html/index.php Cron Del_verhuring
0 0 * * 0 php /scoutnet.be/users/st-joris/public_html/index.php Cron Optimize_DB
0 0 * * 0 php /scoutnet.be/users/st-joris/public_html/index.php Cron Del_activiteiten
