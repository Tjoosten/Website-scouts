# Crontab http://www.st-joris-turnhout.be
#
# ---------------
# Usage:
# ---------------
#
# sudo crontab -l <= see what cronjobs are running
# sudo crontab -e <= edit the crontab
#
# ---------------
# The crontab
# ---------------
#
# .---------------- Minutes (0 - 59)
# |  .------------- Hour (0 - 23)
# |  |  .---------- Day (1 - 31)
# |  |  |  .------- Month (1 - 12) of januari, februari, maart...
# |  |  |  |  .---- Day of the week (0 - 6) (Sunday = 0 or 7)
# |  |  |  |  |
# *  *  *  *  *  Executed command
