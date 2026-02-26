<?php

namespace Database\Seeders;

use App\Models\Treatment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $treatments = [
            'Tab.Cefixime 200',
            'Syp cefuroxime 50',
            'Syp Cefuroxime 100',
            'Syp Cefixime 100',
            'Tab.Azithromycin 500',
            'Tab.Azithromycin 250',
            'Tab.Ofloxacin 200+ Ornidazole 500',
            'Tab.Amoxicilin 500 + Pot. Clavunate125 (625)',
            'Tab.Metronidazole 400 Mg',
            'Cap.Doxycyclin Lb 100 Mg',
            'Tb RIFAXIMIN 550 MG',
            'Tb RIFAXIMIN 550 MG',
            'Tb Cefuroxime 500mg',
            'TAB-Nitroferantoin 100 mg',
            'Syr. Azithromycin 100/200mg',
            'Syr.OFLOXACINE +ORNIDAZOL',
            'Syr.OFLOXACINE +Metronidazol',
            'Syp Amoxclav 457',
            'Tab.Ibuprofen 400 +Paracetamol 325',
            'Tab.Paracetamol 650',
            'Tab.Diclofenac+Paracetamol',
            'Tab.Aceclo + Para+Seraa(Sp)',
            'Tab.Aceclo+Para+Clor(Mr)',
            'Tab.Mefamenic + Paracetamol',
            'Diclofenac 100mg',
            'Diclofenac Gel',
            'Tab.Dicyclomine+ Paracetamol',
            'Tab.Cetrizine 10 mg',
            'Tab.Levocetrizine 5 mg',
            'Tab.Monteluklast(4mg) + Levocetrizine (2.5mg) Kids',
            'Tab.Etofyllin + Theophyllin',
            'Anti Cold Tab (PCM 500 + Phenylephrine HCl 5 mg + Caffeine 30 mg + Diphenhydramine HCl 25 mg )',
            'Tab.Pantoprozole 40 mg + Domperidone 10 mg',
            'Tab.Ranitidine Hcl 150 mg',
            'Cap. Rabeorozole (20 mg + Domperidone 30 mg)',
            'Tab.Pantoprozole 40 Mg',
            'CRM. Luliconazole Ointment 1%',
            'Cap.Itraconazole 100 mg',
            'Cap. Itraconazole 200 mg',
            'Tab.Fluconazole 150 mg',
            'Tab.Albendazole',
            'Tab.Albendazole 400 mg + Ivermectin 6 mg',
            'Tab.Ivermectin',
            'Permethin Lotion',
            'Clobetasol+Gentamicin +Miconazole Cream',
            'Tab.Amlodipine 5 mg',
            'Tab.Telmisartan 20 mg',
            'Tab.Telmisartan 40 + Amlodipin 5 mg',
            'Tab.Folic Acid + Vit B12',
            'Tab.Calcium + Vit D3',
            'Tab.Dexamethasone',
            'Tab.Prednisolon 4 mg',
            'Tab Betahitine 8mg',
            'Tab Betahitine 16mg',
            'Syr.Cyproheptadine HCL 2 ml',
            'Tab. Zinc',
            'Tab Limcee',
            'Syp A To Z',
            'Syr. Paracetamol',
            'Tab Paracetamol / 250 mg',
            'Syr. Ibuprofen 100 + Paracetamol 162.5 mg',
            'Syr Anticold (PCM + Phenylephrine HCl + Diphenhydramine HCl)',
            'Syr. Ondem',
            'Syr. Cefpodoxime 50 mg',
            'Syr. Levosalbutamol',
            'Syr. Mefamenic + Paracetamol',
            'Syr. Cetrizine',
            'Syr. Albendazole',
            'Syr.Ambroxol + Levosalbutamol+ Guaifenesin',
            'Syr.Phenylphrine + Clorpheniramine + Dextromethorphan',
            'Syr.Disodium Hydrogem Citrate',
            'Metformin 500',
            'Glimipride 1 mg',
            'Glimipride 2 mg',
            '(Liquid Paraffin+Milk Of Magnesia+Sodium Picosulfate)',
            'Ciprofloxacine eye/ear drop',
            'Moxifloxacine eye drop',
            'Soliwax Ear Drop ((Benzocain+Chlorbutol+Paradichlorobenzene+Turpentine oil)',
            'Tb Acyclovir 400 Mg',
            'Cardio Kit',
            'Tab Vit D3',
            'Loperamide 2mg',
        ];

        foreach ($treatments as $treatment) {
            Treatment::updateOrCreate(
                ['name' => $treatment],
                ['name' => $treatment]
            );
        }
    }
}
