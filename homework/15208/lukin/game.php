<?php
echo "������ ����� �� 0 �� 100\n";
$ran = rand(0, 100);
for ($i = 7; $i > 0; $i--)
{
	echo "�������� $i �������\n";
	fscanf(STDIN, "%d\n", $try);
	if ($try == $ran)
	{
	echo "�� �������!\n";
	die();
	}
	if ($try < $ran) {echo "������\n";}else{echo "������\n";}

}
echo "�� ���������\n� ������� $ran\n";
?>
