<?php
/**
 * Created by PhpStorm.
 * User: Serbinyo
 * Date: 15.02.2018
 * Time: 1:44
 */
class crud_model_temp extends Model
{
    protected $fillable = [
        '','', '', ''
    ];

    public function store($data, $teacher_id)
    {
        $validator = Validator::make($data,
            [
                '' => '',
                '' => '',
                '' => ''
            ],
            [
                '.required' => 'Необходимо указать',
                '.required' => 'Необходимо указать',
                '.required' => 'Необходимо указать'
            ]);
        if ($validator->fails())
        {
            return ['errors' => $validator->errors()];
        }
        $newMaterial = [
            'teacher_id' => $teacher_id,
            'theme' => $data['theme'],
            'task' => $data['task'],
            'answer' => $data['answer']
        ];
        $this->fill($newMaterial);
        $this->save();
        return $this;
    }
}