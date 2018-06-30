# Sample of Test Data:
# W5RW5RW2RW1R
# RRW11RLLW19RRW12LW1
# LLW100W50RW200W10
# LLLLLW99RRRRRW88LLLRL
# W55555RW555555W444444W1

# วิธีเทส command ของ Sample of Test Data ทั้งหมด
./test.sh

# วิธีเทส command จาก script php โดยตรง
php maqe_robot.php W5RW5RW2RW1R

# วิธีเทส command ของ unit test
./vendor/bin/phpunit MaqeRobotWalkTest tests/MaqeRobotWalkTest.php