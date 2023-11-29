<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
    // Programming languages
    [
        'category' => 'Programming languages',
        'skill' => 'Python',
    ],
    [
        'category' => 'Programming languages',
        'skill' => 'Java',
    ],
    [
        'category' => 'Programming languages',
        'skill' => 'JavaScript',
    ],
    [
        'category' => 'Programming languages',
        'skill' => 'C/C++',
    ],
    // Web development
    [
        'category' => 'Web development',
        'skill' => 'HTML',
    ],
    [
        'category' => 'Web development',
        'skill' => 'CSS',
    ],
    [
        'category' => 'Web development',
        'skill' => 'JavaScript',
    ],
    [
        'category' => 'Web development',
        'skill' => 'React',
    ],
    // Mobile development
    [
        'category' => 'Mobile development',
        'skill' => 'Android',
    ],
    [
        'category' => 'Mobile development',
        'skill' => 'iOS',
    ],
    [
        'category' => 'Mobile development',
        'skill' => 'Flutter',
    ],
    [
        'category' => 'Mobile development',
        'skill' => 'React Native',
    ],
    // DevOps
    [
        'category' => 'DevOps',
        'skill' => 'CI/CD',
    ],
    [
        'category' => 'DevOps',
        'skill' => 'AWS',
    ],
    [
        'category' => 'DevOps',
        'skill' => 'Azure',
    ],
    [
        'category' => 'DevOps',
        'skill' => 'GCP',
    ],
    // Data science and machine learning
    [
        'category' => 'Data science and machine learning',
        'skill' => 'Python',
    ],
    [
        'category' => 'Data science and machine learning',
        'skill' => 'R',
    ],
    [
        'category' => 'Data science and machine learning',
        'skill' => 'SQL',
    ],
    [
        'category' => 'Data science and machine learning',
        'skill' => 'Spark',
    ],
    // Software engineering
    [
        'category' => 'Software engineering',
        'skill' => 'Design patterns',
    ],
    [
        'category' => 'Software engineering',
        'skill' => 'Algorithms',
    ],
    [
        'category' => 'Software engineering',
        'skill' => 'Data structures',
    ],
    [
        'category' => 'Software engineering',
        'skill' => 'Testing',
    ],
    // UX/UI design
    [
        'category' => 'UX/UI design',
        'skill' => 'Figma',
    ],
    [
        'category' => 'UX/UI design',
        'skill' => 'Sketch',
    ],
    [
        'category' => 'UX/UI design',
        'skill' => 'Adobe XD',
    ],
    // Databases
    [
        'category' => 'Databases',
        'skill' => 'SQL',
    ],
    [
        'category' => 'Databases',
        'skill' => 'NoSQL',
    ],
    [
        'category' => 'Databases',
        'skill' => 'Relational databases',
    ],
    [
        'category' => 'Databases',
        'skill' => 'Non-relational databases',
    ],
    // Version control systems
    [
        'category' => 'Version control systems',
        'skill' => 'Git',
    ],
    [
        'category' => 'Version control systems',
        'skill' => 'SVN',
    ],
    [
        'category' => 'Version control systems',
        'skill' => 'Mercurial',
    ],
    // Command-line tools
    [
        'category' => 'Command-line tools',
        'skill' => 'Bash',
    ],
    [
        'category' => 'Command-line tools',
        'skill' => 'SSH',            // ... Other categories and skills ...
         ],
        ];

        foreach($skills as $skill) {
            Skill::create($skill);
        }
    }
}
