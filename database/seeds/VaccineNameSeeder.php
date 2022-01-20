<?php
use App\Models\VaccineName;
use Illuminate\Database\Seeder;

class VaccineNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $vaccineName = new VaccineName();
       $vaccineName->status = '1';
       $vaccineName->name = "Astrazeneca";
       $vaccineName->save();

       $vaccineName = new VaccineName();
       $vaccineName->status = '1';
       $vaccineName->name = "Moderna";
       $vaccineName->save();

       $vaccineName = new VaccineName();
       $vaccineName->status = '1';
       $vaccineName->name = "Sinopharm";
       $vaccineName->save();
    }
}
