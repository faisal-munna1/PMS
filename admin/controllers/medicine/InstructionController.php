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
        $data = Instruction::find($_GET["id"]);

        view("medicine", compact("data"));
    }

    public function update()
    {
        if (!isset($_POST["btn_submit"])) {
            return;
        }

        $instruction = $this->instructionData();
        $instruction->id = $_POST["id"];

        $instruction->update();

        redirect();
    }

    public function delete()
    {
        Instruction::delete($_GET["id"]);

        redirect();
    }

    private function instructionData()
    {
        $instruction = new Instruction();

        $instruction->instruction_name = $_POST["instruction_name"];

        return $instruction;
    }
}