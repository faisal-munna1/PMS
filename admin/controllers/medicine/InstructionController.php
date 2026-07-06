<?php

class InstructionController
{
    public function index()
    {
        $data = Instruction::all();

        view("medicine", compact("data"));
    }

    public function create()
    {
        view("medicine");
    }

    public function save()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $instruction = $this->instructionData();
        $instruction->create();

        redirect();
    }

    public function edit()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if (!$id) {
            redirect();
            return;
        }

        $data = Instruction::find($id);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $instruction = $this->instructionData();
        $instruction->id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

        if ($instruction->id) {
            $instruction->update();
        }

        redirect();
    }

    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            Instruction::delete($id);
        }

        redirect();
    }

    private function instructionData()
    {
        $instruction = new Instruction();

        $instruction->instruction_name = filter_input(INPUT_POST, 'instruction_name', FILTER_DEFAULT);

        return $instruction;
    }
}