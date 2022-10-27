<?php

namespace JpmSchuler\CliAssetResolver\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use UnexpectedValueException;

class GetAssetFolder extends Command
{
    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     *
     * @throws UnexpectedValueException
     */
    public function execute(InputInterface $input, OutputInterface $output)
    {
        if ($input->getArgument('extension')) {
            if (ExtensionManagementUtility::isLoaded($input->getArgument('extension'))) {
                PathUtility::getRelativePathTo('EXT:' . $input->getArgument('extension') . '/Resources/Public');
                return 0;
            }
            $output->writeln(
                'Extension "' . $input->getArgument('extension') . '" not loaded.'
            );
        }
        return 1;
    }

    protected function configure()
    {
        $this
            ->setDescription('Gets the asset folder (formerly typo3conf/ext/myext/Resources/Public) for an extension')
            ->setHelp('Get asset folder for ext')
            ->addArgument('extension', InputArgument::REQUIRED, 'the extension name');
    }

    /**
     * Initializes the command after the input has been bound and before the input
     * is validated.
     *
     * This is mainly useful when a lot of commands extends one main command
     * where some things need to be initialized based on the input arguments and options.
     *
     * @see InputInterface::bind()
     * @see InputInterface::validate()
     */
    protected function initialize(InputInterface $input, OutputInterface $output)
    {
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function interact(InputInterface $input, OutputInterface $output)
    {
        if (!$input->getArgument('extension')) {
            $output->writeln('Please provide a extension name');
            $helper = $this->getHelper('question');
            $question = new Question('extension: ');
            $file = $helper->ask($input, $output, $question);
            $input->setArgument('extension', $file);
        }
    }
}
