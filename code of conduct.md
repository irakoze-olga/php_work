# Code of Conduct

## Our Pledge

We, as contributors and maintainers of this user management project, pledge to make participation in our project and community a respectful, inclusive, and harassment-free experience for everyone, regardless of age, body size, disability, ethnicity, gender identity and expression, level of experience, nationality, personal appearance, race, religion, or sexual identity and orientation.

## Our Standards

### Expected Behavior

- Use welcoming and inclusive language.
- Be respectful of differing viewpoints and experiences.
- Accept constructive criticism gracefully.
- Focus on what is best for the project and the community.
- Show empathy and kindness toward other community members.
- Write clean, well-documented PHP code following PSR standards.
- Keep CSS organized, commented, and maintainable.
- Avoid introducing breaking changes without prior discussion.

### Unacceptable Behavior

- The use of sexualized language or imagery, and unwelcome sexual attention or advances.
- Trolling, insulting or derogatory comments, and personal or political attacks.
- Public or private harassment of any kind.
- Publishing others' private information (such as a physical or email address) without explicit permission.
- Committing code that intentionally introduces security vulnerabilities in user authentication or data handling.
- Any other conduct which could reasonably be considered inappropriate in a professional setting.

## Project-Specific Guidelines

### PHP Development

- Follow PSR-1 and PSR-12 coding standards for all PHP files.
- Never commit credentials, API keys, or database passwords to the repository.
- All user input must be validated and sanitized before processing.
- Use prepared statements or an ORM for all database interactions to prevent SQL injection.
- Password storage must use PHP's `password_hash()` function with a strong algorithm (bcrypt or Argon2).
- Sessions and authentication tokens must be handled securely and invalidated on logout.

### CSS Development

- Use a consistent naming convention (BEM recommended) for class names.
- Avoid inline styles; keep all styles within dedicated CSS files.
- Ensure all UI components meet basic accessibility standards (sufficient color contrast, focus states).
- Do not use `!important` unless absolutely necessary and document the reason with a comment.

### Version Control

- Write clear, descriptive commit messages in the imperative mood (e.g., "Add user role validation" not "Added stuff").
- Do not commit directly to the `main` or `master` branch; use feature branches and pull requests.
- Each pull request should address a single concern or feature.
- Ensure all existing tests pass before submitting a pull request.

## Responsibilities

Project maintainers are responsible for clarifying the standards of acceptable behavior and are expected to take appropriate and fair corrective action in response to any instances of unacceptable behavior.

Maintainers have the right and responsibility to remove, edit, or reject comments, commits, code, issues, and other contributions that are not aligned with this Code of Conduct, and to temporarily or permanently ban any contributor for behaviors they deem inappropriate, threatening, offensive, or harmful.

## Scope

This Code of Conduct applies both within project spaces and in public spaces when an individual is representing the project or its community. Representation includes using an official project email address, posting via an official social media account, or acting as an appointed representative at an online or offline event.

## Enforcement

Instances of abusive, harassing, or otherwise unacceptable behavior may be reported by contacting the project team. All complaints will be reviewed and investigated and will result in a response deemed necessary and appropriate to the circumstances. The project team is obligated to maintain confidentiality regarding the reporter of an incident.

Project maintainers who do not follow or enforce this Code of Conduct in good faith may face temporary or permanent repercussions as determined by other members of the project's leadership.

## Enforcement Guidelines

Project maintainers will follow these guidelines in determining the consequences for any action deemed in violation of this Code of Conduct:

1. **Correction** - A private written warning providing clarity around the nature of the violation and an explanation of why the behavior was inappropriate.
2. **Warning** - A formal warning with consequences for continued behavior. No interaction with the people involved for a specified period of time.
3. **Temporary Ban** - A temporary ban from any sort of interaction or public communication with the project community.
4. **Permanent Ban** - A permanent ban from any sort of public interaction within the project community.

## Attribution

This Code of Conduct is adapted from the Contributor Covenant, version 2.1, and has been extended with project-specific guidelines for PHP and CSS development.