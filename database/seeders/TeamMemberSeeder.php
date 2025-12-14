<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Tanto Trisno, S.Ikom., M.Ikom.',
                'position' => 'Ketua Peneliti',
                'image' => 'team-members/placeholder.jpg',
                'order' => 1,
            ],
            [
                'name' => 'Pupi Indriati Zaelani, S.Sos., M.Si.',
                'position' => 'Peneliti',
                'image' => 'team-members/placeholder.jpg',
                'order' => 2,
            ],
            [
                'name' => 'Reza Saeful Rachman, S.S., M.Pd.',
                'position' => 'Peneliti',
                'image' => 'team-members/placeholder.jpg',
                'order' => 3,
            ],
            [
                'name' => 'Nina Lestari, ST., MT.',
                'position' => 'Peneliti',
                'image' => 'team-members/placeholder.jpg',
                'order' => 4,
            ],
            [
                'name' => 'Yogascitra Naufal S.Ikom., M.Ikom',
                'position' => 'Peneliti',
                'image' => 'team-members/placeholder.jpg',
                'order' => 5,
            ],
            [
                'name' => 'Achmad Defanni Almizar',
                'position' => 'Peneliti',
                'image' => 'team-members/placeholder.jpg',
                'order' => 6,
            ],
            [
                'name' => 'Doni Wenfrey Simorangkir',
                'position' => 'Peneliti',
                'image' => 'team-members/placeholder.jpg',
                'order' => 7,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
