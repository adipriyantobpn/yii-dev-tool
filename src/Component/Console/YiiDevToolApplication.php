<?php

namespace Yiisoft\YiiDevTool\Component\Console;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\HelpCommand;
use Symfony\Component\Console\Command\ListCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Yiisoft\YiiDevTool\Command\CommitCommand;
use Yiisoft\YiiDevTool\Command\InstallCommand;
use Yiisoft\YiiDevTool\Command\LintCommand;
use Yiisoft\YiiDevTool\Command\PullCommand;
use Yiisoft\YiiDevTool\Command\PushCommand;
use Yiisoft\YiiDevTool\Command\ReplicateCommand;
use Yiisoft\YiiDevTool\Command\StatusCommand;
use Yiisoft\YiiDevTool\Command\UpdateCommand;

class YiiDevToolApplication extends Application
{
    private $header = <<<HEADER
 <fg=cyan;options=bold> _   _ </><fg=red;options=bold> _ </><fg=green;options=bold> _ </>
 <fg=cyan;options=bold>| | | |</><fg=red;options=bold>(_)</><fg=green;options=bold>(_)</>  <fg=yellow;options=bold>Development Tool</>
 <fg=cyan;options=bold>| |_| |</><fg=red;options=bold>| |</><fg=green;options=bold>| |</>
 <fg=cyan;options=bold> \__, |</><fg=red;options=bold>|_|</><fg=green;options=bold>|_|</>  <fg=yellow;options=bold>for Yii 3.0</>
 <fg=cyan;options=bold> |___/ </>

This tool helps with setting up a development environment for Yii 3 packages.
HEADER;

    public function __construct()
    {
        parent::__construct($this->header);
    }

    protected function getDefaultCommands()
    {
        return [
            (new HelpCommand())->setHidden(true),
            (new ListCommand())->setHidden(true),
            new CommitCommand(),
            new InstallCommand(),
            new LintCommand(),
            new PullCommand(),
            new PushCommand(),
            new ReplicateCommand(),
            new StatusCommand(),
            new UpdateCommand(),
        ];
    }

    protected function getDefaultInputDefinition()
    {
        return new InputDefinition([
            new InputArgument('command', InputArgument::REQUIRED, 'The command to execute'),
            new InputOption('--help', '-h', InputOption::VALUE_NONE, 'Display this help message'),
        ]);
    }
}