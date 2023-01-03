<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyBudgetModel extends Model
{
    //use HasFactory;
    protected $table = 'budget_category';
    protected $primaryKey = 'category_id';


    private static function get_monthly_budget_categories(){
        return [
            [
                'id' => 1,
                'type' => 'income',
                'slug' => 'monthly-income',
                'name' => 'Monthly Income',    
            ],            
            [
                'id' => 2,
                'type' => 'expense-housing',
                'slug' => 'housing-expenses',
                'name' => 'Housing',    
            ],
            [
                'id' => 3,
                'type' => 'expense-transportation',
                'slug' => 'transportation-expenses',
                'name' => 'Transportation',    
            ],
            [
                'id' => 4,
                'type' => 'expense-educational',
                'slug' => 'educational-expenses',
                'name' => 'Educational',    
            ],   
            [
                'id' => 5,
                'type' => 'expense-personal',
                'slug' => 'food-personal-expenses',
                'name' => 'Food and Personal',    
            ],
            [
                'id' => 6,
                'type' => 'saving',
                'slug' => 'monthly-saving',
                'name' => 'Monthly Saving',    
            ]
        ];
    }

    private static function get_sub_categories($category_type){
        switch ($category_type) {
            case 'income':
                return [
                    [
                        'id' => 1,
                        'type' => 'income',
                        'slug' => 'salary-wage',
                        'name' => 'Salary/Wage'
                    ],
                    [
                        'id' => 2,
                        'type' => 'income',
                        'slug' => 'other-income',
                        'name' => 'Other Income'
                    ]
                ];
            case 'expense-housing':
                return [
                    [
                        'id' => 1,
                        'type' => 'expense-housing',
                        'slug' => 'mortgage',
                        'name' => 'Mortgage'                        
                    ],
                    [
                        'id' => 2,
                        'type' => 'expense-housing',
                        'name' => 'HOA Fees',
                        'slug' => 'hoa-fees'                          
                    ],
                    [
                        'id' => 3,
                        'type' => 'expense-housing',
                        'name' => 'Rent',
                        'slug' => 'rent'                  
                    ],
                    [
                        'id' => 4,
                        'type' => 'expense-housing',
                        'name' => 'HOA Fees',
                        'slug' => 'hoa-fees'                          
                    ],
                    [
                        'id' => 5,
                        'type' => 'expense-housing',
                        'slug' => 'home-insurance',
                        'name' => 'Home Insurance'                          
                    ]                 
                ];
            case 'expense-transportation':
                return [
                    [
                        'id' => 1,
                        'type' => 'expense-transportation',
                        'slug' => 'car-payment',
                        'name' => 'Car Payment'                           
                    ],
                    [
                        'id' => 2,
                        'type' => 'expense-transportation',
                        'slug' => 'car-insurance',
                        'name' => 'Car Insurance'                           
                    ],
                    [
                        'id' => 3,
                        'type' => 'expense-transportation',
                        'slug' => 'gas-fuel',
                        'name' => 'Gas Fuel'                           
                    ],
                    [
                        'id' => 4,
                        'type' => 'expense-transportation',
                        'slug' => 'car-repairs',
                        'name' => 'Car Repairs'                           
                    ],
                ];
            case 'expense-educational':
                return [
                    [
                        'id' => 1,
                        'type' => 'expense-educational',
                        'slug' => 'school-supplies',
                        'name' => 'School Supplies'                          
                    ],
                    [
                        'id' => 2,
                        'type' => 'expense-educational',
                        'slug' => 'student-loans',
                        'name' => 'Student Loans'                                                  
                    ],
                    [
                        'id' => 3,
                        'type' => 'expense-educational',
                        'slug' => 'college-tution',
                        'name' => 'College Tution'
                    ]                        

                ];
            case 'expense-personal':
                return [
                    [
                        'id' => 1,
                        'type' => 'expense-personal',
                        'slug' => 'groceries-household',
                        'name' => 'Groceries/Household'
                    ],
                    [
                        'id' => 2,
                        'type' => 'expense-personal',
                        'slug' => 'clothing',
                        'name' => 'Clothing'                                                
                    ],
                    [
                        'id' => 3,
                        'type' => 'expense-personal',
                        'slug' => 'entertainment',
                        'name' => 'Entertainment'
                    ],
                    [
                        'id' => 4,
                        'type' => 'expense-personal',
                        'slug' => 'medical',
                        'name' => 'Medical'                                                
                    ]                    
                ];
            case 'saving':
                return [
                    [
                        'id' => 1,
                        'type' => 'saving',
                        'slug' => 'emergency-fund',
                        'name' => 'Emergency Fund'
                    ],
                    [
                        'id' => 2,
                        'type' => 'saving',
                        'slug' => 'investment',
                        'name' => 'Investment'
                    ],
                    [
                        'id' => 3,
                        'type' => 'saving',
                        'slug' => 'returement',
                        'name' => 'Retirement'
                    ]
                ];
            default:
                return False;
        }
    }    
}
